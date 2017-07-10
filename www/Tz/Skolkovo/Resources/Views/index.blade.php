<?php
/**
 * Created by PhpStorm.
 * User: a6y
 * Date: 10.07.17
 * Time: 11:56
 */
?>
@extends('skolkovo::layouts.app')
@section('content')
    <div class="row">
        <main class="column">
            <div class="row">
                <div class="columns small-12">
                    <h1>heading H1</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tristique ultricies urna, id dictum erat tristique placerat. Nunc gravida lacus elit, sed hendrerit turpis aliquet quis. Integer ornare massa in metus placerat, quis elementum massa consequat.</p>
                </div>
            </div>
        </main>
    </div>
    <section class="order">
        <div class="row">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert callout" data-closable>
                        <h5>{{$error}}</h5>
                    </div>
                @endforeach
            @endif
            {!! Form::open(['url' => route('skolkovo_order_store'), 'class' => 'order-form ajax-form column small-12', 'data-abide', 'novalidate']) !!}
                <div class="order__fields">
                    <div class="row">
                        <div class="columns small-12">
                            <h2>Выберите удобный для вас тариф</h2>
                        </div>
                        <div class="columns small-12">
                            <div class="order__rates">
                                <div class="form-error">Выберите тариф</div>
                                @foreach($rates as $rate)
                                    <input type="radio" name="type" id="type-{{$rate["id"]}}" required
                                        value="{{$rate["id"]}}"
                                        @if(old('type') == $rate["id"])
                                            checked="checked"
                                        @endif
                                    >
                                    <label class="rate" for="type-{{$rate["id"]}}">
                                        <div class="rate__name">{{$rate["name"]}}</div>
                                        <div class="rate__price">@formatPrice($rate["price"]) руб.</div>
                                        <div class="rate__info">{{$rate["description"]}}</div>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="columns small-12 medium-4">
                            <label for="firstname">Ваше имя</label>
                            <input type="text" name="name" id="firstname" required value="{{old('name')}}">
                        </div>
                        <div class="columns small-12 medium-4">
                            <label for="lastname">Ваша фамилия</label>
                            <input type="text" name="lastname" id="lastname" required value="{{old('lastname')}}">
                        </div>
                        <div class="columns small-12 medium-4">
                            <label for="phone">Ваш телефон</label>
                            <input type="tel" name="phone" id="phone" placeholder="+7 ХХХ ХХХ-ХХ-ХХ" required pattern="tel" value="{{old('phone')}}">
                        </div>
                        <div class="columns small-12">
                            <label for="date-from" class="">Время аренды</label>
                            <div class="row">
                                <div class="columns small-4">
                                    <label for="date-from" class="">с:
                                        <input class="datepicker-here" type="text" name="date-from" id="date-from" placeholder="__.__._____" required="" pattern="date" maxlength="10" value="{{old('date-to')}}" readonly="readonly">
                                    </label>
                                </div>
                                <div class="columns small-4">
                                    <label for="date-to" class="">по:
                                        <input class="datepicker-here" type="text" name="date-to" id="date-to" placeholder="__.__._____" required="" pattern="date" maxlength="10" value="{{old('date-to')}}" readonly="readonly">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="columns small-12">
                            <button class="button" type="submit"> Отправить заявку</button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </section>
    <div class="row">
        <main class="column">
            <div class="row">
                <div class="columns small-12">
                    <h2>heading H2</h2>
                    <p>| In rutrum finibus odio, vel facilisis tellus tincidunt sodales. Integer mattis nibh eu magna vestibulum lacinia. Cras placerat nibh ac lorem ornare pellentesque. Sed mauris orci, cursus volutpat neque quis, pretium ornare ante. Ut at nisl facilisis, suscipit nulla non, suscipit justo. Aliquam vehicula tincidunt odio a feugiat. Nulla at leo vitae risus blandit malesuada. Praesent porta ipsum non egestas venenatis. Nulla facilisi.</p>
                </div>
            </div>
        </main>
    </div>
@endsection
