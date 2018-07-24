<template>
    <div class="row msg_container base_sent">
        <div class="col-md-10 col-xs-10">
            <div class="messages msg_sent">
                <p>that mongodb thing looks good, huh?
                    tiny master db, and huge document store</p>

                <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
            </div>
        </div>
        <div class="col-md-2 col-xs-2 avatar profile-pic">
            <img src="" class=" img-responsive">
        </div>
    </div>
</template>

<script>
    export default{

        data(){
            return {
                messages: [],
            }
        }
    }
</script>