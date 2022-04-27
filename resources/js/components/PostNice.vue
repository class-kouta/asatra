<template>
    <div class="mb-5 float-right">
        <!-- <a href="" class="btn btn-sm" -->
        <button v-on:click="clickNice">
            非同期
        </button>
        <span>
            {{ countNices }}
        </span>
    </div>
</template>

<script>
    export default {
        props: {
            initialIsNicedBy: {
                type: Boolean,
                default: false,
            },
            initialCountNices: {
                type: Number,
                default: 0,
            },
            authorized: {
                type: Boolean,
                default: false,
            },
            endpoint: {
                type: String,
            },
        },
        data() {
            return {
                isNicedBy: this.initialIsNicedBy,
                countNices: this.initialCountNices,
            }
        },
        mounted(){
            console.log('mounted')
        },
        methods: {
            clickNice() {
                console.log('clickNice')
                if (!this.authorized) {
                    alert('いいね機能はログイン中のみ使用できます')
                    return
                }

                this.isNicedBy
                    ? this.unnice()
                    : this.nice()
            },
            async nice() {
                console.log('Nice')
                const response = await axios.put(this.endpoint)

                this.isNicedBy = true
                this.countNices = response.data.countNices
            },
            async unnice() {
                console.log('unNice')
                const response = await axios.delete(this.endpoint)

                this.isNicedBy = false
                this.countNices = response.data.countNices
            },
        },
    }
</script>
