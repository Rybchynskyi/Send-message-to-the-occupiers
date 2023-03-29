<div class="modal fade" id="addPurchase" tabindex="-1" aria-labelledby="addPurchase" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Створити палкий привіт') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Закрити') }}"></button>
            </div>
            <div class="modal-body pb-4">
                <form id="createForm" action="{{ route('purchase.update', 1) }}" method="post">
                    <input id="status" type="hidden" name="status" value="2">
                    <input id="user" type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @csrf
                    @method('patch')
                    <div class="border border-primary rounded px-2 py-2 mb-4">
                        <label for="title" class="form-label"><h5 class="mb-0">{{ __('1. Напишіть своє послання для орків') }}</h5></label>
                        <input id="title" type="text" name="title" class="form-control" maxlength="60">
                        <div class="text-end mt-1">
                            <small id="letterCounter" class="text-success">{{ __('Cимволів залишилось:') }} </small>
                        </div>
                        <h6>{{ __('або виберіть з шаблонів:') }}</h6>
                        <select id="selectMessage" class="form-select" aria-label="templates">
                            <option selected>{{ __('Шаблони:') }}</option>
                            <option value="1">{{ __('З найгіршими побажаннями від …') }}</option>
                            <option value="2">{{ __('«Мертвый русский» - це подарунок тобі, …') }}</option>
                            <option value="3">{{ __('… , з Днем народження') }}</option>
                            <option value="4">{{ __('Zдохніть Vсі') }}</option>
                            <option value="5">{{ __('Слава Україні') }}</option>
                            <option value="6">{{ __('Фашисти') }}</option>
                            <option value="7">{{ __('Горіть у пеклі') }}</option>
                            <option value="8">{{ __('Ловіть привіт від …') }}</option>
                            <option value="9">{{ __('Згинуть наші воріженьки як роса на сонці') }}</option>
                            <option value="10">{{ __('За наших дітей') }}</option>
                            <option value="11">{{ __('Привіт відморозкам') }}</option>
                            <option value="12">{{ __('За Маріуполь') }}</option>
                            <option value="13">{{ __('Хороший русский - мертвый русский') }}</option>
                            <option value="14">{{ __('Хрю-хрю, свинособака') }}</option>
                        </select>
                    </div>
                    <div class="border border-primary rounded px-2 py-2 mb-4">
                        <label for="title" class="form-label"><h5 class="mb-0">{{ __('2. Зробіть донат на ЗСУ') }}</h5></label>
                        <div id="purchaseContainer" class="row">
                            <div class="col-sm mb-2">
                                <div class="form-floating">
                                    <input id="sum" type="number" class="form-control" placeholder="sum" name="sum" value="25" min="25" required>
                                    <label for="floatingInput">{{ __('Сума') }}</label>
                                </div>
                            </div>
                            <div class="col-sm mb-2">
                                <div class="form-floating">
                                    <select class="form-select" aria-label="default" id="currency" name="currency">
                                        <option value="USD">USD</option>
                                        <!--<option value="EUR">EUR</option>-->
                                        <!--<option value="UAH">UAH</option>-->
                                    </select>
                                    <label for="currency">{{ __('Валюта') }}</label>
                                </div>
                            </div>
                        </div>
                        <div id="paypal-button-container"></div>

                        <!--TEST-->
{{--                        <script src="https://www.paypal.com/sdk/js?client-id=AYrzYFMLjdY4Ux1fxGTobgjeVj33gIj9aepZ_60tmni-Wbv9c9k640LvIDEz8I0-jiKXB3coEKoeoc5x&currency=USD"></script>--}}
                        <!--PROD-->
                        <script src="https://www.paypal.com/sdk/js?client-id=AaFTHcvmSLbRo-4ezeC5D7EHSGMK9wkR3JisUqQeKjG3ND0kWVjVw24BJw_Qhbz72lV9QO1r1gZihYuf&currency=USD"></script>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                paypal.Buttons({
                                    // Sets up the transaction when a payment button is clicked
                                    createOrder: (data, actions) => {
                                        return actions.order.create({
                                            purchase_units: [{
                                                amount: {
                                                    "currency_code": document.querySelector("#currency").value,
                                                    "value": document.querySelector("#sum").value
                                                }
                                            }]
                                        });
                                    },
                                    // Finalize the transaction after payer approval
                                    onApprove: (data, actions) => {
                                        return actions.order.capture().then(function (orderData) {
                                            fetch("{{ route('api.purchase.store') }}", {
                                                credentials: "same-origin",
                                                headers: {
                                                    "Content-Type": "application/json",
                                                    "Accept": "application/json",
                                                    "X-Requested-With": "XMLHttpRequest",
                                                    "X-CSRF-Token": "{{ csrf_token() }}"
                                                },
                                                method: "POST",
                                                body: JSON.stringify({
                                                    "title": document.querySelector("#title").value,
                                                    "sum": document.querySelector("#sum").value,
                                                    "status": 1,
                                                    "full_name": document.querySelector("#fullName").value,
                                                    "user_id": document.querySelector("#user").value
                                                })
                                            }).then((response) => {
                                                return response.json();
                                            }).then((data) => {
                                                // for right action
                                                let form = document.getElementById('createForm').action;
                                                let formWithoutId = form.substring(0, form.lastIndexOf('/') + 1);
                                                let formNewId = formWithoutId.concat(data.id);
                                                document.getElementById('createForm').action = formNewId;

                                                // Get sum for google tag manager
                                                let payedSum = document.querySelector("#sum").value;

                                                // Hide PayPal button
                                                document.getElementById("paypal-button-container").hidden = true;

                                                // Hide purchase container
                                                document.getElementById("purchaseContainer").innerHTML = '<div class="col-sm text-success">Оплата зафіксована</div>';

                                                // Activate "Create" button
                                                document.getElementById("createButton").disabled = false;

                                                // Inform about payment
                                                document.getElementById("paymentInform").innerHTML = '<small class="text-success">(Cплачено)</small>';

                                                // Write to google tag manager
                                                dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
                                                dataLayer.push({
                                                    event: "purchase",
                                                    ecommerce: {
                                                        transaction_id: data.id,
                                                        affiliation: "All4Ukraine",
                                                        value: payedSum,
                                                        tax: "0",
                                                        shipping: "0",
                                                        currency: "UAH",
                                                        coupon: "",
                                                        items: [{
                                                            item_name: document.querySelector("#title").value,
                                                            item_id: data.id,
                                                            price: payedSum,
                                                            item_brand: "All4Ukraine",
                                                            item_category: "PPO",
                                                            item_variant: "none",
                                                            quantity: 1
                                                        }]
                                                    }
                                                });
                                            })
                                        });
                                    }
                                }).render('#paypal-button-container')
                            }, false);
                        </script>
                    </div>

                    <div class="border border-primary rounded px-2 py-2 mb-4">
                        <label for="fullName" class="form-label"><h5 class="mb-0">{{ __('3. Напишіть ім`я отримувача сертифікату') }}</h5></label>
                        <input type="text" name="full_name" class="form-control" id="fullName" maxlength="57" value="{{$userName}}">
                        <div class="mt-1">
                            <small>{{ __('Ім‘я потрібно виключно для генерації') }} <a href="{{ route('certificate.example') }}" target="_blank">{{ __('сертифікату') }}</a></small>
                        </div>
                    </div>

                    <div class="text-end">
                        <div class="row">
                            <div class="col-sm">
                                <button id="createButton" type="submit" class="btn btn-primary" disabled>{{ __('Зберегти') }}</button>
                            </div>
                        </div>
                        <div id="paymentInform" class="row">
                            <small class="text-danger">({{ __('Ще не сплачено') }})</small>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
