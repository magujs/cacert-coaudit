<?php

function built_form_header($action){
    return '<form method="post" action="$action">';
}

function built_form_footer($hidden){
    $tabstring = '';
    foreach ($hidden as $hid) {
        $tabstring .= '<input type="hidden" name="'.$hid[0].'" value="'.$hid[1] .'" />';
    }
    $tabstring .= '<form>';
    return $tabstring;

}

function tableheader($title,$cols){
    $tabstring = '<table align="center" valign="middle" border="0" cellspacing="0" cellpadding="0" class="wrapper">';
    $tabstring .= '<tr>';
    $tabstring .=   '<td colspan="'.$cols.'" class="title">'.$title.'</td>';
    $tabstring .= '</tr>';
    return $tabstring;

}

function tablerow_2col_textbox($label, $name, $value){
    $tabstring = '<tr>';
    $tabstring .=   '<td class="DataTD">'.$label.'</td>';
    $tabstring .=   '<td class="DataTD"><input name="'.$name.'" type="text" value="'.$value.'" /></td>';
    $tabstring .= '</tr>';
    return $tabstring;
}

function tablerow_3col_textbox_2col($label, $name, $value){
    $tabstring = '<tr>';
    $tabstring .=   '<td class="DataTD">'.$label.'</td>';
    $tabstring .=   '<td class="DataTD" colspan="2"><input name="'.$name.'" type="text" value="'.$value.'" /></td>';
    $tabstring .= '</tr>';
    return $tabstring;
}

function tablerow_user_rights($roles, $read, $write){
    $tabstring = '<tr>';
    $tabstring .=   '<td class="DataTD"></td>';
    $tabstring .=   '<td class="DataTD">Read</td>';
    $tabstring .=   '<td class="DataTD">Write</td>';
    $i = 0;
    foreach ($roles as $role) {
        if ((pow(2, $i) & $read) == pow(2, $i)) {
            $readpos = 'checked';
        }else{
            $readpos = '';
        }

        if ((pow(2, $i) & $write) == pow(2, $i)) {
            $writepos = 'checked';
        }else{
            $writepos = '';
        }

        $tabstring .= '</tr>';
        $tabstring .=   '<td class="DataTD">'.$role.'</td>';
        $tabstring .=   '<td class="DataTD"><input type="checkbox" name="read'.$i.'" '.$readpos.'/></td>';
        $tabstring .=   '<td class="DataTD"><input type="checkbox" name="write'.$i.'" '.$writepos.'/></td>';
        $tabstring .= '</tr>';

        $i +=1;
    }

    return $tabstring;

}
function tablefooter_user($cols, $uid){
    if ($uid == 0 ) {
        $label = 'New user';
        $name = 'new';
    }else{
        $label = 'Edit user';
        $name = 'edit';
    }

    $tabstring = '<tr>';
    $tabstring .=    '<td class="DataTD" colspan="'.$cols.'"><input type="submit" name="'.$name.'" value="'.$name.'"</td>';
    $tabstring .= '</tr>';
    $tabstring .= '</table>';
    return $tabstring;
}

function tablerow_userlist_header(){
    $tabstring = '<tr>';
    $tabstring .=   '<td class="DataTD">Coauditor</td>';
    $tabstring .=   '<td class="DataTD">Read permission</td>';
    $tabstring .=   '<td class="DataTD">Write permission</td>';
    $tabstring .= '</tr>';
    return $tabstring;
}

function tablerow_userlist($user){
    $tabstring = '<tr>';
    $tabstring .=   '<td class="DataTD"><a href="../www/index.php?type=user&cid='.$user['coauditor_id'].'">'.$user['coauditor_name'].'</a></td>';
    $tabstring .=   '<td class="DataTD">'.$user['read_permission'].'</td>';
    $tabstring .=   '<td class="DataTD">'.$user['write_permission'].'</td>';
    $tabstring .= '</tr>';
    return $tabstring;
}

function tablerow_userlist_new(){
    $tabstring = '<tr>';
    $tabstring .=   '<td class="DataTD" colspan="3"><a href="../www/index.php?type=user&cid=0">New entry</a></td>';
    $tabstring .= '</tr>';
    return $tabstring;
}

function tablerow_no_entry($cols){
    $tabstring = '<tr>';
    $tabstring .=   '<td class="DataTD" colspan="'.$cols.'">No entry available</td>';
    $tabstring .= '</tr>';
    return $tabstring;
}


function start_div($class=''){
    if ($class != '') {
        $class = 'class="'.$class.'"';
    }
    $tabstring = '<div '.$class.'>';
    return $tabstring;
}

function end_div(){
    $tabstring = '</div>';
    return $tabstring;
}
?>