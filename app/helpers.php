<?php

///**
// * 成功跳转
// * @param string $msg
// * @param string $route
// * @return \Illuminate\Http\RedirectResponse
// */
function responseS($msg = '', $route = '')
{
    $msg = trans($msg)?trans($msg):trans('res.success');
    return $route?redirect($route)->with('msg_ok', $msg):redirect()->back()->with('msg_ok', $msg);
}
//
//
//
///**
// * 失败跳转
// * @param string $msg
// * @param string $route
// * @return \Illuminate\Http\RedirectResponse
// */
function responseF($msg = '', $route = '')
{
    $msg = trans($msg)?trans($msg):trans('res.fail');
    return $route?redirect($route)->with('msg_no', $msg):redirect()->back()->with('msg_no', $msg);
}

/**
 * 返回成功请求
 *
 * @param string $data
 * @param string $msg
 * @param string $header
 * @param string $value
 * @return mixed
 */
function responseSuccess($data = '', $msg = '成功', $url = '', $header = 'Content-Type', $value = 'application/json')
{
    $msg = is_array($msg)?json_encode($msg):json_encode([$msg?:trans('response.success')]);
    $res['status']  = ['errorCode' => 0, 'msg' => trans($msg)?trans($msg):$msg];
    $res['data']    = $data;
    $res['url']     = $url;
    return response($content = $res, $status = 200)->header($header, $value);
}

/**
 * 返回错误的请求
 *
 * @param string $msg
 * @param int $code
 * @param string $data
 * @param string $header
 * @param string $value
 * @return mixed
 */
function responseWrong($msg = '失败',  $data = '', $code = 1, $header = 'Content-Typeaa', $value = 'application/json')
{
    $msg = is_array($msg)?json_encode($msg):json_encode([$msg?:trans('response.fail')]);
    $res['status']  = ['errorCode' => $code, 'msg' => trans($msg)?trans($msg):$msg];
    $res['data']    = $data;
    return response($content = $res, $status = 200)->header($header, $value);
}

function create_level_tree($data, $parent_id = 0, $level = 0, $html = '-')
{
    $tree = [];
    foreach ($data as $item) {
        $item['html'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $level);
        $item['html'] .= $level === 0 ? "" : '|';
        $item['html'] .= str_repeat($html, $level);

        if ($item['parent_id'] == $parent_id) {
            $tree[] = $item;
            $tree = array_merge($tree, create_level_tree($data, $item['id'], $level + 1));
        }
    }

    return $tree;
}

function subtree($data,$id=0,$lev=1) {
    $subs = array(); // 子孙数组
    foreach($data as $v) {
        if($v['parent_id'] == $id) {
            $v['lev'] = $lev;
            $subs[] = $v;
            $subs = array_merge($subs,subtree($data,$v['id'],$lev+1));
        }
    }
    return $subs;
}

function menuTree($list, $pk='id', $pid = 'parent_id', $child = '_child', $root=0) {
    // 创建Tree
    $tree = array();
    if(is_array($list)) {
        // 创建基于主键的数组引用
        $refer = array();
        foreach ($list as $key => $data) {
            $refer[$data[$pk]] =& $list[$key];
        }
        foreach ($list as $key => $data) {
            // 判断是否存在parent
            $parentId = $data[$pid];
            if ($root == $parentId) {
                $tree[] =& $list[$key];
            }else{
                if (isset($refer[$parentId])) {
                    $parent =& $refer[$parentId];
                    $parent[$child][] =& $list[$key];
                }
            }
        }
    }
    return $tree;
}

function create_node_tree($data, $parent_id = 0, $name = '_child')
{
    $tree = [];

    foreach ($data as $item) {
        if ($item['parent_id'] == $parent_id) {
            $item[$name] = create_node_tree($data, $item['id']);
            $tree[] = $item;
        }
    }

    return $tree;
}

function two_dimensional_array_sort($array, $on, $order = SORT_ASC)
{
    $new_array = [];
    $sortable_array = [];
    $on = (string)$on;
    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}

