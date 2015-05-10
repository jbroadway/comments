# Comments

A reusable, embeddable comments component for the [Elefant CMS](http://www.elefantcms.com/).

To install, copy it into your apps folder and visit Tools > Comments in the Elefant
admin toolbar.

To embed comments into a view template, simply include the following:

```html
{! comments/embed !}
```

To specify a different page identifier, which should be in the form of a link,
add the `identifier` parameter:

```html
{! comments/embed?identifier=/unique-page-identifier !}
```

If no identifier is provided, it will use the current page URL as the identifier for
all comments made on that page.

To configure moderation options, visit Tools > Comments > Settings in Elefant.

## Blog comments

You can also use this app as the comment mechanism for the blog app, simply set
the `comments` setting in the blog app configuration as follows:

```
comments = comments/embed
```

## Custom email notifications

You can implement notifications or any other action when a comment is posted
by creating a custom handler and adding it to the `[Hooks]` section of the
global `conf/config.php` file like this:

```
comments/add[] = myapp/hook/comments
```

The above line references a handler in the file
`apps/myapp/handlers/hook/comments.php`, which receives a `$data`
array with the following properties:

* `id` - The comment's unique ID
* `identifier` - The comment identifier from the embed code
* `user` - The ID of the user who made the comment
* `name` - The name of the user who made the comment
* `status` - 1 means published, 0 means awaiting moderation
* `ts` - The comment date/time in YYYY-MM-DD HH:MM:SS format
* `date` - The comment date/time in YYYY-MM-DDTHH:MM:SSZ format
* `comment` - The comment itself

For more information on writing hooks, [see here](http://www.elefantcms.com/wiki/Hooks-and-Webhooks).
