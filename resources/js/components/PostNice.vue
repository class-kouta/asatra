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
            const response = await axios.put(this.endpoint)

            this.isNicedBy = true
            this.countNices = response.data.countNices
        } catch (e) {
            alert('エラーが発生しました')
        }
      },
      async unnice() {
          try {
            const response = await axios.delete(this.endpoint)

            this.isNicedBy = false
            this.countNices = response.data.countNices
        } catch (e) {
            alert('エラーが発生しました')
        }
      },
    },
  }

</script>
