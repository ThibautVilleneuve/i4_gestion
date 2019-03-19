<?php

require 'vendor/autoload.php';

const bucket_name = 'ressources';

$s3 = new Aws\S3\S3Client([
    'version' => 'latest',
    'region'  => 'us-east-1',
    'endpoint' => 'http://minio:9000',
    'use_path_style_endpoint' => true,
    'credentials' => [
        'key'    => 'minio',
        'secret' => 'minio123',
    ],
]);


function download($client, $key)
{
    $output = $client->getObject([
        'Bucket' => bucket_name,
        'Key' => $key,
        'SaveAs' => $key . '_local'
    ]);
    return $output['Body'];
}
function upload($client, $key, $path)
{
    $client->putObject([
        'Bucket' => bucket_name,
        'Key' => $key,
        'Body' => fopen($path, 'r'),
    ]);
}
function delete($client, $key)
{
    $client->deleteObject([
        'Bucket' => bucket_name,
        'Key' => $key,
    ]);
}

?>