<?php
/**
 * Configuration - Plugin: Amazon S3 and Cloudfront
 */
if (!empty(getenv('AS3CF_AWS_ACCESS_KEY_ID')) && !empty(getenv('AS3CF_AWS_SECRET_ACCESS_KEY'))) {

    define('AS3CF_AWS_ACCESS_KEY_ID', getenv('AS3CF_AWS_ACCESS_KEY_ID'));
    define('AS3CF_AWS_SECRET_ACCESS_KEY', getenv('AS3CF_AWS_SECRET_ACCESS_KEY'));

}
