<script>

    var user_id = $('meta[name="user_id"]').attr('content');
    var friend_id = $('meta[name="friend_id"]').attr('content');

    export default {
        name: 'create-message',
        data(){
            return{
                message: '',
            }
        },
        methods:{
            sentMessage(){
                if(this.message){
                    var data = {
                        user_id: user_id,
                        friend_id: friend_id,
                        message: this.message,
                    };

                    axios.post('/store-message', data).then(responce=>{
                        this. $eventBus.$emit('message', responce.data.message);
                        this.message = "";
                    }).catch(error=>{
                       console.log(error);
                    });


                }
            }
        }
    }
</script>

<template>
    <div class="row reply">
        <div class="col-sm-11 col-xs-11 reply-main">
            <textarea class="form-control" rows="1" id="comment" v-model="message" v-on:keyup.enter="sentMessage"></textarea>
        </div>
        <div class="col-sm-1 col-xs-1 reply-send">
            <button class="fa fa-send fa-2x" aria-hidden="true" v-on:click="sentMessage"></button>
        </div>
    </div>
</template>