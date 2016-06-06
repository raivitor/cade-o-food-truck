schema([ id, cnpj ]).
fds([ [[id], [cnpj]] ]).
answer(K) :- schema(R),fds(F),candkey(R,F,K). 
