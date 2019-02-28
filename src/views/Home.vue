<template>
  <div class="home section">
    <Game />
  </div>
</template>

<script>
// @ is an alias to /src
import Game from '@/components/Game.vue'

export default {
	name: 'home',
	components: {
		Game
	},
	// created(){
	// 	this.$store.dispatch('loadGames')
	// }
}
</script>
