<?php

/**
 * Is Http Status Code Error
 *
 * @param int $statusCode
 * @return bool
 */
function isHttpStatusCodeError(int $statusCode): bool
{
    return $statusCode >= 400 && $statusCode < 600;
}

/**
 * Is Http Status Code Client Error
 *
 * @param int $statusCode
 * @return bool
 */
function isHttpStatusCodeClientError(int $statusCode): bool
{
    return $statusCode >= 400 && $statusCode < 500;
}

/**
 * Is Http Status Code Server Error
 *
 * @param int $statusCode
 * @return bool
 */
function isHttpStatusCodeServerError(int $statusCode): bool
{
    return $statusCode >= 500 && $statusCode < 600;
}

/**
 * Is Http Status Code Valid
 *
 * @param int $statusCode
 * @return bool
 */
function isHttpStatusCodeValid(int $statusCode): bool
{
    return $statusCode >= 100 && $statusCode < 600;
}
