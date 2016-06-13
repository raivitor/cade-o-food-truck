schema([ id, latitude, longitude ]).
fds([ [[id], [latitude, longitude]] ]).
answer(K) :- schema(R),fds(F),candkey(R,F,K).
