<html lang="en">
    <head>
        <title>{{ trans('cashier::messages.coinpayments.renew_subscription') }}</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            
        <style>
            .mb-10 {
                margin-bottom: 10px;
            }
            .mb-20 {
                margin-bottom: 20px;
            }
            .mb-40 {
                margin-bottom: 40px;
            }
            .mr-10 {
                margin-right: 10px;
            }
            .pl-20 {
                padding-left: 20px;
            }
            .mt-40 {
                margin-top: 40px;
            }
            
            ul.dotted-list {
                list-style: none;
                padding-left: 0;
            }
            .dotted-list > li {
                line-height: 24px;
                padding: 12px 0 11px;
                border-bottom: 1px dotted #e0e0e0;
                display: list-item;
            }
            .dotted-list>li>div {
                padding: 0;
                display: block;
            }
            .topborder>li:first-child {
                border-top: 1px dotted #e0e0e0;
            }
            .size1of2 {
                width: 50%;
                float: left;
            }
            .size1of3 {
                width: 33.3%;
                float: left;
            }
            .size2of3 {
                width: 66.6%;
                float: left;
            }
            .lastUnit, .lastGroup {
                float: none;
                width: auto;
            }
            .lastUnit, .unit {
                padding-left: 15px;
                padding-right: 15px;
            }
            .sub-section {
                margin-bottom: 60px;
            }
            .logo-wrapper {
                padding: 30px 20px 50px 20px;
                background: #eee;
                border-radius: 20px;
            }
            label {
                display: inline-block;
                width: 200px;
                font-weight: 600;
            }
        </style>
    </head>
    
    <body>
        <div class="row mt-40">
            <div class="col-md-2"></div>
            <div class="col-md-3 text-center mt-40">
                <img width="100%" src="{{ url('/vendor/acelle-cashier/image/coinpayments.png') }}" />
            </div>
            <div class="col-md-5 mt-40">
                <h1 class="text-semibold mb-20 mt-0">{{ trans('cashier::messages.coinpayments.renew_subscription') }}</h1>
    
                <p>{!! trans('cashier::messages.coinpayments.renew_plan.intro', [
                    'plan' => $subscription->plan->getBillableName(),
                ]) !!}</p>                    
                <hr>
                <ul>
                    <li>
                        <label>{{ trans('cashier::messages.coinpayments.next_period_day') }}</label>
                        <span>{!! $subscription->nextPeriod() !!}</span>
                    </li>
                    <li>
                        <label>{{ trans('cashier::messages.coinpayments.plan') }}</label>
                        <span>{{ $subscription->plan->getBillableName() }}</span>
                    </li>
                    <li>
                        <label>{{ trans('cashier::messages.coinpayments.amount') }}</label>
                        <span><strong>{{ $subscription->plan->getBillableFormattedPrice() }}</strong></span>
                    </li>
                </ul>
                <hr>
                
                <form method="POST" action="{{ action('\Acelle\Cashier\Controllers\CoinpaymentsController@renew', ['subscription_id' => $subscription->uid]) }}">
                    {{ csrf_field() }}
                    
                    <button
                        class="btn btn-primary mr-10"
                    >{{ trans('cashier::messages.coinpayments.renew_proceed') }}</button>
                        
                    <a
                    href="{{ $return_url }}"
                        class="btn btn-secondary mr-10"
                    >{{ trans('cashier::messages.coinpayments.return_back') }}</a>
                </form>
                    
            </div>
            <div class="col-md-2"></div>
        </div>
        <br />
        <br />
        <br />
    </body>
</html>