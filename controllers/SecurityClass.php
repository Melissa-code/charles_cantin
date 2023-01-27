<?php


class SecurityClass
{
    /**
     * Secure & prevent the user typing
     *
     * @param string $typing
     * @return string|null
     */
    public static function secureHtml(string $typing): ?string {
        $typing = trim($typing);
        $typing = stripcslashes($typing);
        $typing = htmlentities($typing);
        return $typing;
    }
    
}