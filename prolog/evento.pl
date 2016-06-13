schema([ id, data_de_inicio, data_de_termino, nome, descricao ]).
fds([ [[id], [ data_de_inicio, data_de_termino, nome, descricao]] ]).
answer(K) :- schema(R),fds(F),candkey(R,F,K). 
