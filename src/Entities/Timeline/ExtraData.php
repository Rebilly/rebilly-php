<?php
/**
 * This source file is proprietary and part of Rebilly.
 *
 * (c) Rebilly SRL
 *     Rebilly Ltd.
 *     Rebilly Inc.
 *
 * @see https://www.rebilly.com
 */

namespace Rebilly\Entities\Timeline;

use Rebilly\Rest\Resource;

final class ExtraData extends Resource
{
    public function getActions()
    {
        return $this->getAttribute('actions');
    }

    /**
     * @return ExtraDataTable[]
     */
    public function getTables()
    {
        return $this->getAttribute('tables');
    }

    /**
     * @return ExtraDataAuthor
     */
    public function getAuthor()
    {
        return $this->getAttribute('author');
    }

    /**
     * @return array
     */
    public function getMentions()
    {
        return $this->getAttribute('mentions');
    }

    /**
     * @return ExtraDataLink[]
     */
    public function getLinks()
    {
        return $this->getAttribute('links');
    }

    /**
     * @param array $data
     *
     * @return ExtraDataAuthor
     */
    public function createAuthor(array $data)
    {
        return new ExtraDataAuthor($data);
    }

    /**
     * @param array $data
     *
     * @return ExtraDataLink[]
     */
    public function createLinks(array $data)
    {
        $links = [];

        foreach ($data as $linkData) {
            $links[] = new ExtraDataLink($linkData);
        }

        return $links;
    }

    /**
     * @param array $data
     *
     * @return ExtraDataTable[]
     */
    public function createTables(array $data)
    {
        $tables = [];

        foreach ($data as $tableData) {
            $tables[] = new ExtraDataTable($tableData);
        }

        return $tables;
    }
}
