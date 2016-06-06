schema([ id, nome, preco, ingredientes, descricao ]).
fds([ [[id], [nome, preco, ingredientes, descricao]] ]).
answer(K) :- schema(R),fds(F),candkey(R,F,K). 
