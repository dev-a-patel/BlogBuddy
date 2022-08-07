<?php
$existingUser = '';
function validateUser($user)
{
    $errors = array();

    if (empty($user['username'])) { 
        array_push($errors, '<b>Name</b> is required');
    }
    
    if (empty($user['email'])) { 
        array_push($errors, '<b>Email</b> is required');
    }
    
    if (empty($user['password'])) { 
        array_push($errors, '<b>Password</b> is required');
    }
    
    $existingUser = selectOne('users', ['email' => $user['email']]); 
    
    if ($existingUser) 
    {
        if( isset($user['update-user']) && $existingUser['id'] != $user['id'])
        {array_push($errors, '<b>Email already exists</b>');}
        
        if( isset($user['create-admin']))
        {array_push($errors, '<b>Email already exists</b>');}
    }

    return $errors;
}

function validateLogin($user)
{
    $errors = array();
    
    if (empty($user['email'])) { 
        array_push($errors, '<b>Name</b> is required');
    }
    
    if (empty($user['password'])) { 
        array_push($errors, '<b>Password</b> is required');
    }
    
    $existingUser = selectOne('users', ['email' => $user['email']]); 
    if (!($existingUser)) {
        array_push($errors, "<b>Email doesn't exists</b>");
    }

    return $errors;
}

?>