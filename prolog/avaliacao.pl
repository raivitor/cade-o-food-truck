schema([ cliente_id, food_truck_id, nota, data ]).
fds([ [[cliente_id, food_truck_id], [nota, data]] ]).
answer(K) :- schema(R),fds(F),candkey(R,F,K). 
