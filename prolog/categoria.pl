schema([ id, nome ]).
fds([ [[id], [nome]] ]).
answer(K) :- schema(R),fds(F),candkey(R,F,K). 
