<script>
    var user_id = $('meta[name="user_id"]').attr('content');
    export default {
        name: 'add-friends',
        props: ['id'],
        data() {
            return {
                authUser: user_id,
                users: [],
            }
        },
        created() {
            axios.get('/add-friends').then(responce => {
                this.users = responce.data.users;
            }).catch(error => {
                console.log(error);
            });
        },
        methods: {
            addFriend(id){
                var data = {
                    user_id: user_id,
                    friend_id: id,
                };

                axios.post('/add-friend', data).then(responce=>{
                    console.log(responce);
//                    $('button[id='+id+']').css('display', 'none');
                    $('#'+id).css('display', 'none');
                }).catch(error=>{
                   console.log(error);
                });


            }
        }
    }
</script>

<template>
    <div class="row compose-sideBar" style="height: 100%">
        <div class="row sideBar-body" v-for="(user, key) in users" v-if="user.id != authUser" v-bind:id="user.id">
            <div class="col-sm-3 col-xs-3 sideBar-avatar">
                <div class="avatar-icon">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png">
                </div>
            </div>
            <div class="col-sm-9 col-xs-9 sideBar-main">
                <div class="row">
                    <div class="col-sm-8 col-xs-8 sideBar-name">
                        <span class="name-meta">{{ user.name }}</span>
                    </div>
                    <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                        <span class="time-meta pull-right"><button class="btn btn-success" v-on:click="addFriend(user.id)">+</button></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>