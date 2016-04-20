<?php

/**
 * 登入驗證，設定SESSION並跳轉頁面，不合則返回錯誤訊息
 * @param string $account 帳號
 * @param string $password 密碼
 * @return array
 */
function loginValidation($account, $password)
{
    global $entityManager;

    if ($account == null) {
        return $errorMsg = array("accountEpt" => "未輸入帳號");
    }
    if ($password == null) {
        return $errorMsg = array("passwordEpt" => "未輸入密碼");
    }

    $member = $entityManager->getRepository('Member')->findOneBy(array('account' => $account));
    if ($member == null) {
        return $errorMsg = array("error" => "無此帳號");
    }
    if ($member->getPassword() != $password) {
        return $errorMsg = array("error" => "密碼錯誤");
    }

    $_SESSION['id'] = $member->getId();
    $_SESSION['account'] = $account;
    $_SESSION['name'] = $member->getName();
    header('Location: messageboard.php');
}

/**
 * 註冊驗證，返回成功或失敗訊息
 * @param string $account 帳號
 * @param string $password 密碼
 * @param string $password2 重覆輸入密碼
 * @param string $name 名稱
 * @return array
 */
function registerValidation($account, $password, $password2, $name)
{
    global $entityManager;

    if ($account == null) {
        $accountEpt = "未輸入帳號";
        return $errorMsg = array("accountEpt" => "未輸入帳號");
    }
    if ($password == null) {
        $passwordEpt = "未輸入密碼";
        return $errorMsg = array("passwordEpt" => "未輸入密碼");
    }
    if (strcmp($password2, $password) != 0) {
        $notEqu = "輸入兩次密碼不相同";
        return $errorMsg = array("notEqu" => "輸入兩次密碼不相同");
    }
    if ($name == null) {
        $nameEpt = "未輸入暱稱";
        return $errorMsg = array("nameEpt" => "未輸入暱稱");
    }

    $member = new Member($account, $password, $name);
    $entityManager->persist($member);
    $entityManager->flush();

    if ($entityManager == null) {
        return $errorMsg = array("error" => "資料庫異常，申請失敗!");
    }
    return $errorMsg = array("success" => "帳號新增成功!");
}
