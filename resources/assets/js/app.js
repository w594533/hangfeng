
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('index', require('./components/index.vue'));

import data_cn from './api/normal_data_cn'
import data_en from './api/normal_data_en'

const app = new Vue({
    el: '#app',
    data(){
      return {
        data:data_cn,
        lang:["中文","ENGLISH"],
        navIndex:0,
        langIndex:0,
        clapImg:require('./assets/img/clap.png'),
        isFold:true,
        isWhite:true,
        currentIndex:0
      }
    },
    methods:{
      selectNav(item,index){
        this.navIndex=index
        this.showFold(item,index)
        if(!item.detail){
          this.chgNav(index)
        }
      },
      chgRouter(index,sonIndex){
        if(index==1){
          if(sonIndex==0){
            this.$router.push("/about/show")
          }else if(sonIndex==1){
            this.$router.push("/about/honor")
          }else if(sonIndex==2){
            this.$router.push("/about/partner")
          }else if(sonIndex==3){
            this.$router.push("/about/culture")
          }else{
            this.$router.push("/about/dev")
          }
        }else if(index==2){
          this.currentIndex=sonIndex
          this.$router.push("/product")
          if(this.$refs.router.update){
            this.$refs.router.update(sonIndex)
          }
        }else{
          this.$router.push("/news/"+sonIndex)
          if(this.$refs.router.$children[0]){
            this.$refs.router.$children[0].update()
          }
        }
        this.hide()
        this.isFold=true
        this.clapImg=require('./assets/img/clap.png')
      },
      fold(){
        this.isFold=!this.isFold
        if(this.isFold){
          this.clapImg=require('./assets/img/clap.png')
        }else{
          this.clapImg=require('./assets/img/exit.png')
        }
      },
      chgLang(index){
        console.log(this.$refs.abc)
        this.langIndex=index
        if(index==0){
          this.data=data_cn
        }else{
          this.data=data_en
        }
      },
      chgNav(index){
        this.navIndex=index
        if(index==0){
          this.$router.push("/")
        }else if(index==1){
          this.$router.push("/about/show")
        }else if(index==2){
          this.$router.push("/product")
        }else if(index==3){
          this.$router.push("/news/0")
        }else if(index==4){
          this.$router.push("/join")
        }else{
          this.$router.push("/contact")
        }
        this.isFold=true
        this.clapImg=require('./assets/img/clap.png')
        this.hide()
      },
      show(item,index){
        if(item.detail){
          if(index==1){
            this.$refs.ul1[0].style.display="block"
          }else if(index==2){
            this.$refs.ul2[0].style.display="block"
          }else{
            this.$refs.ul3[0].style.display="block"
          }
        }
      },
      showFold(item,index){
        if(item.detail){
          if(index==1){
            // this.$refs.foldul1[0].style.display=
                  // this.$refs.foldul1[0].style.display=="block"?"none":"block"
            this.$refs.foldul1[0].style.height=
                  this.$refs.foldul1[0].style.height=='24vh'?'0px':'24vh'
            if(this.$refs.foldul2[0].style.height=='34vh'){
              this.$refs.foldul2[0].style.height='0px'
            }
            if(this.$refs.foldul3[0].style.height=='20vh'){
              this.$refs.foldul3[0].style.height='0px'
            }
          }else if(index==2){
            // this.$refs.foldul2[0].style.display=
            //       this.$refs.foldul2[0].style.display=="block"?"none":"block"
            this.$refs.foldul2[0].style.height=
                  this.$refs.foldul2[0].style.height=='34vh'?'0px':'34vh'
            if(this.$refs.foldul1[0].style.height=='24vh'){
              this.$refs.foldul1[0].style.height='0px'
            }
            if(this.$refs.foldul3[0].style.height=='20vh'){
              this.$refs.foldul3[0].style.height='0px'
            }
          }else{
            this.$refs.foldul3[0].style.height=
                  this.$refs.foldul3[0].style.height=='20vh'?'0px':'20vh'
            if(this.$refs.foldul2[0].style.height=='34vh'){
              this.$refs.foldul2[0].style.height='0px'
            }
            if(this.$refs.foldul1[0].style.height=='24vh'){
              this.$refs.foldul1[0].style.height='0px'
            }
          }
        }else{
          this.$refs.foldul1[0].style.height='0px'
          this.$refs.foldul2[0].style.height='0px'
        }
      },
      hide(){
        this.$refs.ul1[0].style.display="none"
        this.$refs.ul2[0].style.display="none"
        this.$refs.ul3[0].style.display="none"
      },
      active(item,index){
        item.img=require('./assets/img/'+item.type+'_checked.png')
      },
      recover(item){
        item.img=require('./assets/img/'+item.type+'.png')
      }
    }
});
