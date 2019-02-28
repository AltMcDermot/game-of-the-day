<template>
  <div>
    <Loading v-if="!getGames"></Loading>
    <div class="columns is-multiline">
      <!-- :class=" column is-one-quarter" -->
      <div  v-for="(game, index) in getGames" :key="game.guid" :class="[index === 0 ? 'column is-8 is-offset-2' : 'column is-one-quarter']">
        <div class="card" >
            <div class="card-image">
              <figure class="image is-4y3">
                <img :src="game.image.small_url" alt="Placeholder image">
              </figure>
            </div>
            <div class="card-content">
              <div class="media">
                
                <div class="media-content">
                  <p class="title is-4">{{game.name}}</p>
                  <div class="platforms">
                    <p><b>Platforms:</b></p>
                    <span v-for="platform in game.platforms" :key="platform.key">{{platform.name}}</span>
                  </div>
                </div>
              </div>
      
              <div class="content" style="display:none;">
                
                <a href="#">#css</a> <a href="#">#responsive</a>
                <br>
                <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Loading from '@/components/Loading'
export default {
  name: 'Game',
  props: {
    msg: String
  },
  components:{
    Loading
  },
  created(){
    this.$store.dispatch('loadGames')
  },
  computed:{
    getGames(){
      return this.$store.getters.getGames[0]
    }
  }

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .platforms{}
  .platforms span:after{ content: ', ' }
  .platforms span:last-of-type:after{ content: '' }
</style>
