@extends('layouts.admin')

@section('content')
    @if(session('success'))
        <div id="toastsContainerTopRight" class="toasts-top-right fixed">
            <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header"><strong class="mr-auto">Успіх</strong><small>Закрити</small>
                    <button data-bs-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="toast-body">{{ session('success') }}</div>
            </div>
        </div>
    @elseif(session('deleted'))
        <div id="toastsContainerTopRight" class="toasts-top-right fixed">
            <div class="toast bg-danger fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header"><strong class="mr-auto">Не успіх</strong><small>Закрити</small>
                    <button data-bs-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="toast-body">{{ session('deleted') }}</div>
            </div>
        </div>
    @endif

    <div class="row mx-2">
        <div class="col-sm">
            <div class="d-flex my-2 align-items-center">
                <h3 class="mt-0 my-2">Налаштування відправлення</h3>
            </div>
        </div>
    </div>
    <div class="row mx-2">
        <div class="col-sm">
            <form method="post" action="{{ route('admin.settings.edit') }}">
                @csrf
                <div class="row mb-3 d-flex align-items-center">
                    <div class="col-sm-6"><label for="telegramId" class="form-label">Відправляти повідомлення в групу автоматично</label></div>
                    <div class="col-sm-3">
                        <div class="checkbox-wrapper-8">
                            <input type="hidden" name="sendMessage" value="off">
                            <input class="tgl tgl-skewed" id="cb3-8" name="sendMessage" type="checkbox"
                                @if($sendMessage->value === "on")
                                   checked="checked"
                                @endif
                            />
                            <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb3-8"></label>
                        </div>
                    </div>
                    <div class="col-sm-3"><button type="submit" class="btn btn-primary">Зберегти</button></div>
                </div>
            </form>
            <form method="post" action="{{ route('admin.settings.edit') }}">
                @csrf
                <div class="row mb-3 d-flex align-items-center">
                    <div class="col-sm-6"><label for="numberInPackage" class="form-label">Кількість замовлень в пакеті відправки</label></div>
                    <div class="col-sm-3">
                        <input type="range"
                               class="form-range"
                               min="1"
                               max="10"
                               step="1"
                               oninput="showVal(this.value)"
                               onchange="showVal(this.value)"
                               id="numberInPackage"
                               name="numberInPackage"
                               value="{{ $quantityInPackage->value }}">
                        <span id="quantity" class="h4 ml-3">{{ $quantityInPackage->value }}</span>
                        <script>
                            function showVal(newVal){
                                document.getElementById("quantity").innerHTML=newVal;
                            }
                        </script>
                    </div>

                    <div class="col-sm-3"><button type="submit" class="btn btn-primary">Зберегти</button></div>
                </div>
            </form>
            <form method="post" action="{{ route('admin.settings.edit') }}">
                @csrf
                <div class="row mb-3 d-flex align-items-center">
                    <div class="col-sm-6"><label for="telegramId" class="form-label">ID групи в Telegram для відправки</label></div>
                    <div class="col-sm-3"><input type="text" class="form-control mr-3" id="telegramId" name="telegramId" aria-describedby="telegramId" value="{{ $telegramId->value }}"></div>
                    <div class="col-sm-3"><button type="submit" class="btn btn-primary">Зберегти</button></div>
                </div>
            </form>
            <form method="post" action="{{ route('admin.settings.edit') }}">
                @csrf
                <div class="row mb-3 d-flex align-items-center">
                    <div class="col-sm-6"><label for="signalId" class="form-label">ID групи в Signal для відправки</label></div>
                    <div class="col-sm-3"><input type="text" class="form-control mr-3" id="signalId" name="signalId" aria-describedby="signalId" value="{{ $signalId->value }}"></div>
                    <div class="col-sm-3"><button type="submit" class="btn btn-primary">Зберегти</button></div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row mx-2">
        <div class="col-sm">
            <div class="d-flex my-2 align-items-center">
                <h3 class="mt-0 mb-2">Налаштування призначення</h3>
            </div>
        </div>
    </div>
    <div class="row mx-2">
        <div class="col-sm">
            <form method="post" action="{{ route('admin.settings.edit') }}">
                @csrf
                <div class="row mb-3 d-flex align-items-center">
                    <div class="col-sm-6"><label for="telegramId" class="form-label">Відправляти кошти на заявку автоматично</label></div>
                    <div class="col-sm-3">
                        <div class="checkbox-wrapper-8">
                            <input type="hidden" name="addOrder" value="off">
                            <input class="tgl tgl-skewed" id="addOrder" name="addOrder" type="checkbox"
                                   @if($isAddOrder->value === "on")
                                   checked="checked"
                                @endif
                            />
                            <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="addOrder"></label>
                        </div>
                    </div>
                    <div class="col-sm-3"><button type="submit" class="btn btn-primary">Зберегти</button></div>
                </div>
            </form>

            <form method="post" action="{{ route('admin.settings.edit') }}">
                @csrf
                <div class="row mb-3 d-flex align-items-center">
                    <div class="col-sm-9">
                        <label for="signalId" class="form-label">Заявка, на яку будуть направлені кошти</label>
                        <input type="hidden" id="selectedOrder" value="{{ $orderByDeffault->value }}">
                        <select class="send_to form-select mb-2" name="orderByDefault" aria-label="orderByDefault">
                            {{--data from js--}}
                        </select>
                    </div>

                    <div class="col-sm-3"><button type="submit" class="btn btn-primary">Зберегти</button></div>
                </div>
            </form>

            <form method="post" action="{{ route('admin.settings.edit') }}">
                @csrf
                <div class="row mb-3 d-flex align-items-center">
                    <div class="col-sm-6"><label for="telegramId" class="form-label">Перерахунок по курсу</label></div>
                    <div class="col-sm-3">
                        <input type="number" class="form-control mr-3" id="currency" name="currency" aria-describedby="currency" value="{{ $currency->value }}">
                    </div>
                    <div class="col-sm-3"><button type="submit" class="btn btn-primary">Зберегти</button></div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row mx-2">
        <div class="col-sm">
            <div class="d-flex my-2 align-items-center">
                <h3 class="mt-0 mb-2">Налаштування iнформування в групу фонду</h3>
            </div>
        </div>
    </div>
    <div class="row mx-2">
        <div class="col-sm">
            <form method="post" action="{{ route('admin.settings.edit') }}">
                @csrf
                <div class="row mb-3 d-flex align-items-center">
                    <div class="col-sm-6"><label for="telegramId" class="form-label">Відправляти повідомлення в групу фонду автоматично</label></div>
                    <div class="col-sm-3">
                        <div class="checkbox-wrapper-8">
                            <input type="hidden" name="send_message_to_group" value="off">
                            <input class="tgl tgl-skewed" id="send_message_to_group" name="send_message_to_group" type="checkbox"
                                   @if($sendMessageToGroup->value === "on")
                                   checked="checked"
                                @endif
                            />
                            <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="send_message_to_group"></label>
                        </div>
                    </div>
                    <div class="col-sm-3"><button type="submit" class="btn btn-primary">Зберегти</button></div>
                </div>
            </form>
            <form method="post" action="{{ route('admin.settings.edit') }}">
                @csrf
                <div class="row mb-3 d-flex align-items-center">
                    <div class="col-sm-6"><label for="telegram_group" class="form-label">ID групи фонду в Telegram для відправки</label></div>
                    <div class="col-sm-3"><input type="text" class="form-control mr-3" id="telegram_group" name="telegram_group" aria-describedby="telegram_group" value="{{ $telegramGroup->value }}"></div>
                    <div class="col-sm-3"><button type="submit" class="btn btn-primary">Зберегти</button></div>
                </div>
            </form>
        </div>
    </div>
    @vite('resources/js/orderListFromMainSite.js')
@endsection

