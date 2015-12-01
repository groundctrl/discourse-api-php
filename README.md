# Discourse API for PHP

## Installation

Using [composer](https://packagist.org/packages/ctrl/discourse):

```
composer require ctrl/discourse
```

## Configuration

Copy the `Resources/examples/config.dist.php` file as `config.php`

```
cp Resources/examples/config.dist.php Resources/examples/config.php
```

Insert the correct value for `base_url`, `api_key` and `sso_secret`. The value for `api_username` should stay as `system`

> NOTE: A `.gitignore` file is in place to prevent you from committing this file.

## Testing

From the CLI. If any of these throws a Guzzle error, well, it ain't working correctly.

#### Groups

###### Groups

```
php Resources/examples/groups.php
```

###### Create Group

```
php Resources/examples/createGroup.php [NAME]
```

###### Add Member(s) to Group

```
php Resources/examples/groupAdd.php [GROUP_ID] [USERNAME]
```

###### Remove Member(s) from Group

```
php Resources/examples/groupRemove.php [GROUP_ID] [USERNAME]
```

###### Group Members

```
php Resources/examples/groupMembers.php [SLUG]
```

#### Categories

###### Create Category

```
php Resources/examples/createCategory.php [SLUG] [HEX_COLOR] [TEXT_HEX_COLOR]
```

###### Latest Topics for a Category

```
php Resources/examples/categoryLatestTopics.php [CATEGORY_SLUG]
```

###### Delete Category

```
php Resources/examples/deleteCategory.php [CATEGORY_ID]
```

#### Users

###### Users

```
php Resources/examples/users.php
```

###### User

```
php Resources/examples/user.php [USERNAME]
```

###### Active Users

```
php Resources/examples/activeUsers.php
```
