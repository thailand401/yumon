Skills = function(options){
	return {
		id: options[0],
		name: options[1], //name
		require: options[2], // mana
		affect: options[3], // team | enemy
		type: options[4], // 0,1,2 : attack, defense, effect
		value: options[5], // 0 : value | 1 : list re-skill | 2 : value
		where: options[6], // attribute receive value
		when: options[7] // start | awhile | end
	}
}