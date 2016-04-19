<?php

/**
 * 登入驗證，設定SESSION並跳轉頁面，不合則返回錯誤訊息
 * @global object $entityManager
 * @param string $id
 * @param string $pw
 * @return array
 */
function loginValidation($id, $pw)
{
    global $entityManager;

    if ($id == null) {
        return $errorMsg = array("idEpt" => "未輸入帳號");
    } elseif ($pw == null) {
        return $errorMsg = array("pwEpt" => "未輸入密碼");
    }

    $member = $entityManager->getRepository('Member')->find($id);
    if ($member == null) {
        return $errorMsg = array("error" => "無此帳號");
    } elseif ($member->getPassword() != $pw) {
        return $errorMsg = array("error" => "密碼錯誤");
    }

    $_SESSION['id'] = $id;
    $_SESSION['name'] = $member->getName();
    header('Location: messageboard.php');
}
/**
 * 註冊驗證，返回成功或失敗訊息
 * @global object $entityManager
 * @param string $id
 * @param string $pw
 * @param string $pw2
 * @param string $name
 * @return array
 */
function registerValidation($id, $pw, $pw2, $name)
{
    global $entityManager;

    if ($id == null) {
        $idEpt = "未輸入帳號";
        return $errorMsg = array("idEpt" => "未輸入帳號");
    } elseif ($pw == null) {
        $pwEpt = "未輸入密碼";
        return $errorMsg = array("pwEpt" => "未輸入密碼");
    } elseif (strcmp($pw2, $pw) != 0) {
        $notEqu = "輸入兩次密碼不相同";
        return $errorMsg = array("notEqu" => "輸入兩次密碼不相同");
    } elseif ($name == null) {
        $nameEpt = "未輸入暱稱";
        return $errorMsg = array("nameEpt" => "未輸入暱稱");
    }

    $member = new Member();
    $member->setId($id);
    $member->setPassword($pw);
    $member->setName($name);
    $entityManager->persist($member);
    $entityManager->flush();

    if ($entityManager == null) {
        return $errorMsg = array("error" => "資料庫異常，申請失敗!");
    }
    return $errorMsg = array("success" => "帳號新增成功!");
}
