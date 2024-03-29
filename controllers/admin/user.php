<?php

require_once __DIR__ . '/../../infra/repositories/userRepository.php';
require_once __DIR__ . '/../../helpers/validations/admin/validate-user.php';
require_once __DIR__ . '/../../helpers/validations/admin/validate-password.php';
require_once __DIR__ . '/../../helpers/session.php';

if (isset($_POST['user'])) {
    if ($_POST['user'] == 'create') {
        create($_POST);
    }

    if ($_POST['user'] == 'update') {
        update($_POST);
    }

    if ($_POST['user'] == 'profile') {
        updateProfile($_POST);
    }

    if ($_POST['user'] == 'password') {
        changePassword($_POST);
    }
}

if (isset($_GET['user'])) {
    if ($_GET['user'] == 'update') {
        $user = getById($_GET['id']);
        $user['action'] = 'update';
        $params = '?' . http_build_query($user);
        header('location: /Trabalho_SIR/pages/secure/admin/user.php' . $params);
    }

    if ($_GET['user'] == 'delete') {
        $user = getById($_GET['id']);
        if ($user['administrator']) {
            $_SESSION['errors'] = ['This user cannot be deleted!'];
            header('location: /Trabalho_SIR/pages/secure/admin/');
            return false;
        }

        $success = delete_user($user);

        if ($success) {
            $_SESSION['success'] = 'User deleted successfully!';
            header('location: /Trabalho_SIR/pages/secure/admin/');
        }
    }
}

function create($req)
{
    $data = validatedUser($req);

    if (isset($data['invalid'])) {
        $_SESSION['errors'] = $data['invalid'];
        $params = '?' . http_build_query($req);
        header('location: /Trabalho_SIR/pages/secure/admin/user.php' . $params);
        return false;
    }

    $success = createUser($data);

    if ($success) {
        $_SESSION['success'] = 'User created successfully!';
        header('location: /Trabalho_SIR/pages/secure/admin/');
    }
}

function update($req)
{
    $data = validatedUser($req);

    if (isset($data['invalid'])) {
        $_SESSION['errors'] = $data['invalid'];
        $_SESSION['action'] = 'update';
        $params = '?' . http_build_query($req);
        header('location: /Trabalho_SIR/pages/secure/admin/user.php' . $params);

        return false;
    }

    $success = updateUser($data);

    if ($success) {
        $_SESSION['success'] = 'User successfully changed!';
        $data['action'] = 'update';
        $params = '?' . http_build_query($data);
        header('location: /Trabalho_SIR/pages/secure/admin/user.php' . $params);
    }
}

function updateProfile($req)
        {
            $data = validatedUser($req);
        
            if (isset($data['invalid'])) {
                $_SESSION['errors'] = $data['invalid'];
                $params = '?' . http_build_query($req);
                header('location: /Trabalho_SIR/pages/secure/user/profile.php' . $params);
            } else {
                $user = user();
                if ($user['administrator'] == 1) {
                    $data['administrator'] = $user['administrator'];
                }
                $data['id'] = $user['id'];
                $data['foto'] = $user['foto'];
                if (!empty($_FILES['foto']['name'])) {
                    deleteFile($data['foto']);
                    $data = saveFile($data, $req);
                }
        
                $success = updateUser($data);
        
                if ($success) {
                    $_SESSION['success'] = 'User successfully changed!';
                    $_SESSION['action'] = 'update';
                    $params = '?' . http_build_query($data);
                    header('location: /Trabalho_SIR/pages/secure/user/profile.php' . $params);
                }
            }
        }

function changePassword($req)
{
    $data = passwordIsValid($req);
    if (isset($data['invalid'])) {
        $_SESSION['errors'] = $data['invalid'];
        $params = '?' . http_build_query($req);
        header('location: /Trabalho_SIR/pages/secure/user/password.php' . $params);
    } else {
        $data['id'] = userId();
        $success = updatePassword($data);
        if ($success) {
            $_SESSION['success'] = 'Password successfully changed!';
            header('location: /Trabalho_SIR/pages/secure/user/password.php');
        }
    }
}
function saveFile($data, $oldImage = null)
{
    $fileName = $_FILES['foto']['name'];
    $tempFile = $_FILES['foto']['tmp_name'];
    $extension = pathinfo($fileName, PATHINFO_EXTENSION);
    $extension = strtolower($extension);
    $newName = uniqid('foto_') . '.' . $extension;
    $path = __DIR__ . '/../../assets/images/uploads/';
    $file = $path . $newName;
    if (move_uploaded_file($tempFile, $file)) {
        $data['foto'] = $newName;
        if (isset($data['user']) && ($data['user'] == 'update') || ($data['user'] == 'profile')) {
            unlink($path . $oldImage['foto']);
        }
    }
    return $data;
}
function deleteFile($fileName)
{
    $path = __DIR__ . '/../../assets/images/uploads/';
    $fileToDelete = $path . $fileName;
    if (is_file($fileToDelete)) {
        unlink($fileToDelete);
        return true;
    } else {
        return false;
    }
}
function delete_user($user)
{
    echo $user['foto'];
    deleteFile($user['foto']);
    $data = deleteUser($user['id']);
    echo $data;
    return $data;
}
