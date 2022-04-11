<?php

class PageMetadata
{
    private string $game;
    private string $navname;
    private int $year;
    private static array $pages = [];

    /**
     * @param string $game
     * @param int $year
     */
    public function __construct(string $game = "", int $year = -1, string|bool $navname = false)
    {
        $this->game = $game;
        $this->year = $year;
        if ($navname === false) {
            $this->navname = $game;
        } else {
            $this->navname = $navname;
        }
    }

    /**
     * @return string
     */
    public function getGame(): string
    {
        return $this->game;
    }

    /**
     * @return string
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return array
     */
    public static function getPages(): array
    {
        return self::$pages;
    }

    /**
     * @param string $game
     */
    public function setGame(string $game): void
    {
        $this->game = $game;
    }

    /**
     * @param string $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function page(): string
    {
        return "game_20$this->year.php";
    }

    /*
     *  Lehet hogy Ctrl+C Ctrl+V és ez miatt lehet h maradtak dolgok, amiket nem írtam át, sry
     */

    private static function defaultPage(): void
    {
        self::$pages = [];
        self::$pages[] = new PageMetadata("Dragon Age: Inqusition", 14);
        self::$pages[] = new PageMetadata("The Witcher 3: Wild Hunt", 15, "The Witcher 3:<br>Wild Hunt");
        self::$pages[] = new PageMetadata("Overwatch", 16);
        self::$pages[] = new PageMetadata("The Legend of Zelda: Breath of The Wild", 17, "The Legend of Zelda:<br>Breath of The Wild");
        self::$pages[] = new PageMetadata("God of War", 18);
        self::$pages[] = new PageMetadata("Sekiro: Shadows Die Twice", 19);
        self::$pages[] = new PageMetadata("The Last of Us Part II", 20);
        self::$pages[] = new PageMetadata("It Takes Two", 21);
        self::savePages();
    }

    public static function loadPages(): void
    {
        if (!file_exists("data/pages.data")) {
            self::defaultPage();
            return;
        }
        try {
            $content = file_get_contents("data/pages.data");
            if ($content === false) {
                self::defaultPage();
            }
            self::$pages = unserialize($content);
            if (!isset($pages) || count(self::$pages) == 0) {
                self::defaultPage();
            }
        } catch (Exception $e) {
            self::defaultPage();
        }
    }

    public static function savePages(): void
    {
        $c = serialize(self::$pages);
        if (!is_dir("data")) {
            mkdir("data");
        }
        file_put_contents("data/pages.data", $c);
    }

    public static function existByName(string $name): bool
    {
        return self::pageByName($name) !== false;
    }

    public static function pageByName(string $name): PageMetadata|bool
    {
        foreach (self::$pages as $u) {
            if ($u instanceof PageMetadata) {
                if ($u->getGame() === $name) {
                    return $u;
                }
            }
        }
        return false;
    }

    public static function existByYear(int $year): bool
    {
        return self::pageByYear($year) !== false;
    }

    public static function pageByYear(int $year): PageMetadata|bool
    {
        foreach (self::$pages as $u) {
            if ($u instanceof PageMetadata) {
                if ($u->getYear() == $year) {
                    return $u;
                }
            }
        }
        return false;
    }

    /**
     * @return string
     */
    public function getNavname(): string
    {
        return $this->navname;
    }

    /**
     * @param string $navname
     */
    public function setNavname(string $navname): void
    {
        $this->navname = $navname;
    }


}