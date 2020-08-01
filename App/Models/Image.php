<?php

declare(strict_types = 1);

namespace App\Models;

use Core\Model;
use PDO;
use PDOStatement;

/**
 * Class Image
 * @package App\Models
 */
class Image extends Model
{
    /**
     * @return array
     */
    public function getAll() : array
    {
        $sql = "SELECT * FROM images";
        return $this->DB->run($sql)->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param int $uploaderId
     * @param string $name
     * @param string $path
     * @param string $thumbnailPath
     * @param string $size
     * @return PDOStatement
     */
    public function create(int $uploaderId, string $name, string $path, string $thumbnailPath, string $size) : PDOStatement
    {
        $sql = "INSERT INTO images (uploaderId, name, path, thumbnailPath, size)
        VALUES (:uploaderId, :name, :path, :thumbnailPath, :size)";

        return $this->DB->run($sql, [$uploaderId, $name, $path, $thumbnailPath, $size]);
    }

    /**
     * @param int $id
     * @return object
     */
    public function get(int $id) : object
    {
        $sql = "SELECT * FROM images WHERE id = :id";
        return $this->DB->run($sql, [$id])->fetch(PDO::FETCH_OBJ);
    }

    /**
     * @param int $id
     * @return void
     */
    public function destroy(string $id) : void
    {
        $sql = "DELETE FROM images WHERE id = ?";
        $stmt = $this->DB->run($sql, [$id]);
    }

    /**
     * @return array
     */
    public function getImagesAndUsers() : array
    {
        $sql =
        "SELECT images.id as imageId, images.uploaderId, images.name, images.path, images.thumbnailPath, 
                users.id, users.username, users.email, users.streetAddress, users.city, users.postcode, users.country
        FROM images
        LEFT JOIN users ON images.uploaderId = users.id
        ORDER BY images.id ASC";

        return $this->DB->run($sql)->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param $id
     * @return object|null
     */
    public function getFilePaths($id)
    {
        $sql = "SELECT images.path, images.thumbnailPath FROM images WHERE $id = :id LIMIT 1";
        if($this->DB->run($sql, [$id])->fetch(PDO::FETCH_OBJ))
        {
            return $this->DB->run($sql, [$id])->fetch(PDO::FETCH_OBJ);
        }
        else
        {
            return null;
        }
    }

    /**
     * @return int
     */
    public function getCount() : int
    {
        $sql = "SELECT COUNT(*) FROM images AS image_count";
        return $this->DB->run($sql)->rowCount();
    }
}
