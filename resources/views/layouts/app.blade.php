<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <div class="nav clearfix">
          <div class="logo">
            <img src="./assets/img/logo.png" width="100%">
          </div>
          <div class="detail">
            <div v-for="(item,index) in data.nav"
                 @mouseenter="show(item,index)"
                 @mouseleave="hide()">
              <span :class="{active:index==navIndex,fontBlack:!isWhite}"
                    @click="chgNav(index)"
                    v-html="item.title"
                    >
              </span>
              <ul v-if="item.detail" :ref="'ul'+index">
                <li v-for="(items,sonIndex) in item.detail" @click="chgRouter(index,sonIndex)" v-html="items">
                </li>
              </ul>
            </div>
          </div>
          <div class="lang">
            <span v-for="(item,index) in lang"
                  :class="{active:index==langIndex}"
                  @click="chgLang(index)"
                  v-html="item">
            </span>
          </div>
          <div class="clap" @click="fold">
            <img :src="clapImg" height="100%">
          </div>
        </div>
        <transition name="slide-fade">
          <div class="clapnav" v-if="!isFold">
            <div v-for="(item,index) in data.nav">
              <span :class="{active:index==navIndex}"
                    @click="selectNav(item,index)"
                    v-html="item.title"
                    >
              </span>
              <ul v-if="item.detail" :ref="'foldul'+index" class="clapul">
                <li v-for="(items,sonIndex) in item.detail" @click="chgRouter(index,sonIndex)" v-html="items"></li>
              </ul>
            </div>
          </div>
        </transition>


        @yield('content')

        <div class="footer">
          <div class="nav">
            <span v-for="(item,index) in data.footer.nav" @click="chgNav(index)" v-html="item"></span>
          </div>
          <p v-html="data.footer.msg"></p>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
