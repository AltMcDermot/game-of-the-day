import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
	state: {
		games: []
	},
	mutations: {
		LOAD_GAMES(state, payload){
			state.games.push(payload)
		}
	},
	actions: {
		loadGames(context){
			axios.get(location.href + '/process.php')
			// axios.get('//localhost/game-of-the-day/public/process.php')
			.then(function (response) {
				// console.log(response.data.results)
				// console.log(location.href + 'process.php')
				
				context.commit('LOAD_GAMES', response.data.results)
			})
		}
	},
	getters: {
		getGames(state){
			return state.games
		}
	}
})
