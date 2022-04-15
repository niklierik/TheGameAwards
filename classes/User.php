<?php

class User
{
    private string $name;
    private string $pwd;
    private string $email;
    private string $desc = "";
    private bool $isAdmin = false;
    private array $friends = [];
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
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->isAdmin;
    }

    /**
     * @param bool $isAdmin
     */
    public function setIsAdmin(bool $isAdmin): void
    {
        $this->isAdmin = $isAdmin;
    }

    /**
     * @return array
     */
    public function getFriends(): array
    {
        return $this->friends;
    }

    /**
     * @param array $friends
     */
    public function setFriends(array $friends): void
    {
        $this->friends = $friends;
    }

    public function removeFriend(string|User $user): void
    {
        if (!is_string($user)) {
            $user = $user->getName();
        }
        $cpy = [];
        foreach ($this->getFriends() as $f) {
            if ($user != $f) {
                $cpy[] = $f;
            }
        }
        $this->setFriends($cpy);
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

    public function addFriend(User|string $u): void
    {
        if (!is_string($u)) {
            $u = $u->getName();
        }
        if (!in_array($u, $this->friends)) {
            $this->friends[] = $u;
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

    public static function areFriends(User|bool $a, User|bool $b): bool
    {
        if ($a === false) {
            return $b === false;
        } else {
            return in_array($b->getName(), $a->getFriends()) && in_array($a->getName(), $b->getFriends());
        }
    }

    /**
     * @param User|bool $from
     * @param User|bool $to
     * @return bool csak akkor ad vissza igazat ha nem barátok, de a $from bejelölte barátnak a $to-t
     */
    public static function isFriendshipRequested(User|bool $from, User|bool $to): bool
    {
        if ($from === false || $to === false) {
            return false;
        }
        return in_array($to->getName(), $from->getFriends()) && !in_array($from->getFriends(), $to->getFriends());
    }

}