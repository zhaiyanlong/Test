<?php
/**
 * Created by PhpStorm.
 * User: cony
 * Date: 14-2-28
 * Time: 下午3:25
 */
function access($attr, $path, $data, $volume) {
    return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
        ? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
        :  null;                                    // else elFinder decide it itself
}

function set_nav($module,$guide){
    $map=$guide?array('cid'=>$guide):'';
    switch($module){
        case 'news':
            return U('/news/index',$map);
            break;
        case 'product':
            return(U('/product/index',$map));
            break;
        case 'message':
            return(U('/message/index'));
            break;
        case 'link':
            break;
        case 'page':
            $m_page=M('page');
            $ename=$m_page->where('id='.$guide)->getField('unique_id');
            return(U('/page/index',array('name'=>$ename)));
            break;
        default:
            return(U('/index/index'));
            break;
    }

}

