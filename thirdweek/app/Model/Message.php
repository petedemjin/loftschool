<?php


namespace App\Model;

use App\Db;

class Message
{
    private $id;
    private $content;
    private $createdAt;
    private $authorId;
    /** @var User */
    private $author;
    private $image;

    public function __construct(array $data)
    {
        $this->content = $data['content'];
        $this->createdAt = $data['created_at'];
        $this->authorId = $data['author_id'];
        $this->image = $data['image'] ?? '';
    }

    public static function deleteMessage(int $messageId)
    {
        $db = Db::getInstance();
        $query = "DELETE FROM messages WHERE id = $messageId";
        return $db->exec($query, __METHOD__);
    }

    public function save()
    {
        $db = Db::getInstance();
        $res = $db->exec(
            'INSERT INTO messages (
                    content, 
                    created_at,
                    author_id,
                    image
                    ) VALUES (
                    :content, 
                    :created_at,
                    :author_id,
                    :image
                )',
            __FILE__,
            [
                ':content' => $this->content,
                ':created_at' => $this->createdAt,
                ':author_id' => $this->authorId,
                ':image' => $this->image,
            ]
        );
        return $res;
    }

    public static function getList(int $limit = 10, int $offset = 0): array
    {
        $db = Db::getInstance();
        $data = $db->fetchAll(
            "SELECT * fROM messages LIMIT $limit OFFSET $offset",
            __METHOD__
        );
        if (!$data) {
            return [];
        }

        $messages = [];
        foreach ($data as $elem) {
            $message = new self($elem);
            $message->id = $elem['id'];
            $messages[] = $message;
        }
        return $messages;
    }

    public static function getUserMessages(int $userId, int $limit): array
    {
        $db = Db::getInstance();
        $data = $db->fetchAll(
            "SELECT * fROM messages WHERE author_id = $userId LIMIT $limit",
            __METHOD__
        );
        if (!$data) {
            return [];
        }

        $messages = [];
        foreach ($data as $elem) {
            $message = new self($elem);
            $message->id = $elem['id'];
            $messages[] = $message;
        }
        return $messages;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->content;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function setAuthor(User $author): void
    {
        $this->author = $author;
    }

    public function loadFile(string $file)
    {
        if (file_exists($file)) {
            $this->image = $this->genFileName();
            move_uploaded_file($file,__DIR__ . '/../../images/' . $this->image);
        }
    }

    private function genFileName()
    {
        return sha1(microtime(1) . mt_rand(1, 100000000)) . '.jpg';
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    public function getData()
    {
        return [
            'id' => $this->id,
            'author_id' => $this->authorId,
            'content' => $this->content,
            'created_at' => $this->createdAt,
            'image' => $this->image
        ];
    }
}