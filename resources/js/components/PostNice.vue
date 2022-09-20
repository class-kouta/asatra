<template>
  <div>
    <button
      type="button"
      class="e-btn"
    >
      <i class="fas fa-heart"
        :class="{'is-text_pink':this.isNicedBy}"
        @click="clickNice"
      />
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
    methods: {
      clickNice() {
        if (!this.authorized) {
          alert('いいね機能はログイン中のみ使用できます')
          return
        }

        this.isNicedBy
          ? this.unnice()
          : this.nice()
      },
      async nice() {
        try {
            this.isNicedBy = true
            this.countNices++

            await axios.put(this.endpoint)
        } catch (e) {
            this.isNicedBy = false
            this.countNices--

            alert('エラーが発生しました。少し時間をおいてから再度お試しください。')
        }
      },
      async unnice() {
        try {
            this.isNicedBy = false
            this.countNices--

            await axios.delete(this.endpoint)
        } catch (e) {
            this.isNicedBy = true
            this.countNices++

            alert('エラーが発生しました。少し時間をおいてから再度お試しください。')
        }
      },
    },
  }

</script>
