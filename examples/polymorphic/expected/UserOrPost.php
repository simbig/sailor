<?php

declare(strict_types=1);

namespace Spawnia\Sailor\Polymorphic;

/**
 * @extends \Spawnia\Sailor\Operation<\Spawnia\Sailor\Polymorphic\UserOrPost\UserOrPostResult>
 */
class UserOrPost extends \Spawnia\Sailor\Operation
{
    public static function execute(string $id): UserOrPost\UserOrPostResult
    {
        return self::executeOperation(...func_get_args());
    }

    public static function document(): string
    {
        return /* @lang GraphQL */ 'query UserOrPost($id: ID!) {
          node(id: $id) {
            id
            ... on User {
              name
            }
            ... on Post {
              title
            }
            __typename
          }
          __typename
        }';
    }

    public static function endpoint(): string
    {
        return 'polymorphic';
    }
}