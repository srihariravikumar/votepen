@component('mail::message')

# Dear {{ '@' . $user->username }}, moderator of [#{{ $category->name }}](https://Tagvote.co/c/{{ $category->name }}?ref=email)

To keep the community clean and active, we are deleting all the inactive channels that haven't had any activities in the last 60 days. Your **#{{ $category->name }}** channel hasn't had any activities in **{{ optional($category->submissions()->orderBy('created_at', 'desc')->first())->created_at->diffInDays() }} days**. Thus, In case you intend to keep your channel alive, please start posting to it. Otherwise, just ignore this email.

We'll begin deleting inactive channels a week after the date of sending this email.

@component('mail::button', ['url' => config('app.url') . '/c/' . $category->name . '?ref=email'])
    Go to #{{ $category->name }}
@endcomponent

Thank you for being a Tagvote moderator!<br>
The Tagvote Team

@component('mail::subcopy')
    Need help? Check out our [Help Center](https://tagvote.com/help), ask [community](https://tagvote.com/c/TagvoteSupport), or hit us up on Twitter [@tagvote](https://twitter.com/tagvote).
    Want to give us feedback? Let us know what you think on our [feedback page](https://tagvote.com/feedback).
@endcomponent

@endcomponent
