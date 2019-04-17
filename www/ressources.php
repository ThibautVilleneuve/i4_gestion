<?php

require 'vendor/autoload.php';

const bucket_name = 'ressources';

use Aws\S3\S3Client;

$s3 = new Aws\S3\S3Client([
    'version' => 'latest',
    'region'  => 'us-east-1',
    'endpoint' => 'http://192.168.99.100:31675',
    'use_path_style_endpoint' => true,
    'credentials' => [
        'key'    => 'minio',
        'secret' => 'minio123',
    ],
]);

if (!$s3->doesBucketExist(bucket_name)) {
        $s3->createBucket([
            'Bucket' => bucket_name
]);
}

function download($key)
{
    global $s3;
    return $s3->getObject([
        'Bucket' => bucket_name,
        'Key' => $key,
    ]);
    return $output['Body'];
}


function upload($key, $path)
{
    global $s3;
    return $s3->putObject([
        'Bucket' => bucket_name,
        'Key' => $key,
        'Body' => $path
    ]);
}

function delete($key)
{
    global $s3;
    return $s3->deleteObject([
        'Bucket' => bucket_name,
        'Key' => $key,
    ]);
}


