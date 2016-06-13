schema([ id, tipo ]).
fds([ [[id], [tipo]] ]).
answer(K) :- schema(R),fds(F),candkey(R,F,K). 
