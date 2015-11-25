<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Tests;

use Rebilly\ApiKeyProvider;
use Rebilly\Client;
use Rebilly\Rest\File;
use RuntimeException;

/**
 * Class FileTest.
 *
 * @group wip
 */
class FileTest extends TestCase
{
    public function testFile()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        $client = new Client(
            [
                'apiKey' => ApiKeyProvider::env(),
                'httpHandler' => function () use ($client) {
                    $response = $client
                        ->createResponse()
                        ->withHeader('Content-Type', 'application/pdf');

                    $response
                        ->getBody()
                        ->write(file_get_contents(__DIR__ . '/Stub/invoice.pdf'));

                    return $response;
                },
            ]
        );

        $file = $client->invoices()->loadPdf('c79c2e4d-4209-47e0-8459-26416d1fb749-1');

        if ($file instanceof File) {
            $filename = tempnam(sys_get_temp_dir(), 'Invoice');
            $file->save($filename);

            $this->assertTrue(file_exists($filename));
            $this->assertEquals($file->getSize(), filesize($filename));
        } else {
            throw new RuntimeException('Cannot download file');
        }
    }
}
