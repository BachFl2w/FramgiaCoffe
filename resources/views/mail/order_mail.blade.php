<p><img src="https://framgia.com/wp-content/themes/frg-framgia/images/framgia-logo-black.png"></p>

<p>{{ __('message.order.confirm') }}</p>

{{-- @component('mail::table') --}}
<table border="1" style="border-collapse: collapse">
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
        @for($i = 0; $i < 10; $i++)
            <tr>
                <td>{{ $i }}</td>
                <td>Doe</td>
                <td>john@example.com</td>
                <td>john@example.com</td>
                <td>john@example.com</td>
                <td>john@example.com</td>
                <td>Here</td>
            </tr>
        @endfor
    </tbody>
</table>
{{-- @endcomponent --}}
