<?php

/**
 * 登入驗證，設定SESSION並跳轉頁面，不合則返回錯誤訊息
 * @global object $entityManager
 * @param string $account
 * @param string $pw
 * @return array
 */
function loginValidation($account, $pw)
{
    global $entityManager;

    if ($account == null) {
        return $errorMsg = array("accountEpt" => "未輸入帳號");
    }
    if ($pw == null) {
        return $errorMsg = array("pwEpt" => "未輸入密碼");
    }

    $member = $entityManager->getRepository('Member')->findOneBy(array('account' => $account));
    if ($member == null) {
        return $errorMsg = array("error" => "無此帳號");
    }
    if ($member->getPassword() != $pw) {
        return $errorMsg = array("error" => "密碼錯誤");
    }

    $_SESSION['id'] = $member->getId();
    $_SESSION['account'] = $account;
    $_SESSION['name'] = $member->getName();
    header('Location: messageboard.php');
}

/**
 * 註冊驗證，返回成功或失敗訊息
 * @global object $entityManager
 * @param string $account
 * @param string $pw
 * @param string $pw2
 * @param string $name
 * @return array
 */
function registerValidation($account, $pw, $pw2, $name)
{
    global $entityManager;

    if ($account == null) {
        $accountEpt = "未輸入帳號";
        return $errorMsg = array("accountEpt" => "未輸入帳號");
    }
    if ($pw == null) {
        $pwEpt = "未輸入密碼";
        return $errorMsg = array("pwEpt" => "未輸入密碼");
    }
    if (strcmp($pw2, $pw) != 0) {
        $notEqu = "輸入兩次密碼不相同";
        return $errorMsg = array("notEqu" => "輸入兩次密碼不相同");
    }
    if ($name == null) {
        $nameEpt = "未輸入暱稱";
        return $errorMsg = array("nameEpt" => "未輸入暱稱");
    }

    $member = new Member($account, $pw, $name);
    $entityManager->persist($member);
    $entityManager->flush();

    if ($entityManager == null) {
        return $errorMsg = array("error" => "資料庫異常，申請失敗!");
    }
    return $errorMsg = array("success" => "帳號新增成功!");
}
