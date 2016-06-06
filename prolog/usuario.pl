schema([email, nome, senha, data_de_nascimento, cpf]).
fds([ [[email], 
      [nome, senha, data_de_nascimento, cpf]] ]).
answer(K) :- schema(R),fds(F),candkey(R,F,K). 
