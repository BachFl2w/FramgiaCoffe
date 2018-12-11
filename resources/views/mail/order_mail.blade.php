<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h2>Framgia Coffe</h2>
    <p>{{ __('message.order.confirm') }}</p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('message.id') }}</th>
                <th>{{ __('message.order_title.receiver') }}</th>
                <th>{{ __('message.order_title.time_order') }}</th>
                <th>{{ __('message.order_title.address_order') }}</th>
                <th>{{ __('message.order_title.phone_order') }}</th>
                <th>{{ __('message.order_title.status') }}</th>
                <th>{{ __('message.order_title.note') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
            </tr>
        </tbody>
    </table>
</div>
</body>
</html>
