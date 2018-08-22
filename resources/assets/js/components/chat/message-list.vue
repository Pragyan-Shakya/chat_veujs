<script>
    var user_id = $('meta[name="user_id"]').attr('content');
    var friend_id = $('meta[name="friend_id"]').attr('content');

    export default {
        name: 'message-list',
        data() {
            return {
                messages: [],
                friend: {},
                user: {},
            }
        },
        created() {
            var this_ = this;
            this_.fetchSelectedFriend();
            this_.fetchAuthUserDetail();

            this_.$eventBus.$on('message', function (playload) {
                this_.messages.push(playload);
            });

            if(friend_id != 'undefined') {
                axios.get('/fetch-message/' + friend_id).then(responce => {
                    this_.messages = responce.data.messages;
                }).catch(error => {
                    console.log(error);
                });

                Echo.private('chat.' + friend_id + '.' + user_id)
                    .listen('BroadcastMessages', (e)=>{
                        this_.messages.push(e.message);
                    });
            }
        },
        methods: {
            fetchSelectedFriend() {
                axios.get('/selected-friend/' + friend_id).then(responce => {
                    this.friend = responce.data.friend;
                }).catch(error => {
                    console.log(error);
                });
            },

            fetchAuthUserDetail() {
                axios.get('/user-detail').then(responce => {
                    this.user = responce.data.user;
                }).catch(error => {
                    console.log(error);
                });
            }
        }
    }
</script>

<template>
    <div class="row message" id="conversation" v-if="messages.length > 0">


        <div class="row message-body" v-for="(message, key) in messages">
            <div class="col-sm-12 message-main-sender" v-if="message.friend_id == friend.id">
                <div class="sender">
                    <div class="message-text">
                        {{ message.message }}
                    </div>
                    <span class="message-time pull-right">{{ message.created_at }}</span>
                </div>
            </div>


            <div class="col-sm-12 message-main-receiver" v-if="message.user_id == friend.id">
                <div class="receiver">
                    <div class="message-text" >
                        {{ message.message }}
                    </div>
                    <span class="message-time pull-right">{{ message.created_at }}</span>
                </div>
            </div>
        </div>
    </div>
</template>