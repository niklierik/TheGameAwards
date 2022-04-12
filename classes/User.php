<?php

class User
{
    private string $name;
    private string $pwd;
    private string $email;
    private string $desc;
    //private bool $valid = true;

    private static array $users = [];

    /**
     * @param string $user
     * @param string $pwd
     */
    public function __construct(string $user = "", string $pwd = "", string $email = "")
    {
        $this->name = $user;
        $this->pwd = $pwd;
        $this->email = $email;
    }
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDesc(): string
    {
        return $this->desc;
    }

    /**
     * @param string $desc
     */
    public function setDesc(string $desc): void
    {
        $this->desc = $desc;
    }

    /**
     * @param string $name
     */
    private function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPwd(): string
    {
        return $this->pwd;
    }

    /**
     * @param string $pwd
     */
    public function setPwd(string $pwd): void
    {
        $this->pwd = $pwd;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }


    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }


    public function insert(): void
    {
        $i = 0;
        foreach (self::$users as $user) {
            if ($user instanceof User) {
                if ($user->getName() == $this->getName()) {
                    self::$users[$i] = $user;
                }
            }
            $i++;
        }
    }

    public static function unregister(User $u): void
    {
        $userscpy = [];
        foreach (self::$users as $user) {
            if ($user->getName() !== $u->getName()) {
                $userscpy[] = $user;
            }
        }
        self::$users = $userscpy;
        unset($u);
        self::saveUsers();
    }

    private static function defaultUsers(): void
    {
        self::$users = [];
    }

    public static function loadUsers(): void
    {
        if (!file_exists("data/users.data")) {
            self::defaultUsers();
            return;
        }
        try {
            $content = file_get_contents("data/users.data");
            if ($content === false || !isset($content) || $content === "") {
                self::defaultUsers();
                return;
            }
            self::$users = unserialize($content);
            if (!isset(self::$users)) {
                self::defaultUsers();
                return;
            }
        } catch (Exception $e) {
            self::defaultUsers();
            return;
        }
    }

    public static function saveUsers(): void
    {
        $c = serialize(self::$users);
        if (!is_dir("data")) {
            mkdir("data");
        }
        file_put_contents("data/users.data", $c);
    }

    public static function users(): array
    {
        return self::$users;
    }

    public static function existByName(string $name): bool
    {
        return self::userByName($name) !== false;
    }

    public static function userByName(string $name): User|bool
    {
        foreach (self::$users as $u) {
            if ($u instanceof User) {
                if ($u->getName() === $name) {
                    return $u;
                }
            }
        }
        return false;
    }

    public static function existByEmail(string $email): bool
    {
        return self::userByEmail($email) !== false;
    }

    public static function userByEmail(string $email): User|bool
    {
        foreach (self::$users as $u) {
            if ($u instanceof User) {
                if ($u->getEmail() === $email) {
                    return $u;
                }
            }
        }
        return false;
    }

    public static function registerUser(User $u): void
    {
        self::$users[] = $u;
        self::saveUsers();
    }

}