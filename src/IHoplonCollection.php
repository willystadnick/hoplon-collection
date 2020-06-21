<?php

namespace hoplon {

	interface IHoplonCollection
	{
		/// <summary>
		/// Adiciona um elemento na coleção. Os elementos são armazenados na memória em ordem crescente.
		/// Esta coleção não permite valores duplicados (funciona como um Set).
		/// Caso seja chamado esta API com um valor que já foi mapeado para a chave e para algum subIndice, o valor antigo deve ser removido e o novo
		/// valor deve ser adicionado na posição correta considerando ordem crescente.
		/// </summary>
		/// <param name="key">a chave que mapeia o item. Deve ser uma string</param>
		/// <param name="subIndex">um indice para agrupar os valores</param>
		/// <param name="value">Deve ser uma string</param>
		/// <returns>Retorna true se o elemento foi adicionado, caso o elemento está presente na lista retorna false e autaliza a posição dele de acordo com a ordem crescente</returns>
		public function Add($key, $subIndex, $value);

	    /// <summary>
	    /// Retorna uma lista com os valores que a chave esta armazenando de acordo com os limites de inicio e fim. Os valores são unicos (não tem valor duplicado).
	    /// A lista retornada esta ordenada em ordem crescente.
	    /// O parâmetro start e end são indices no formato zero-base, onde o primeiro elemento é representado pelo indice 0, o segundo elemento com indice 1 e assim por diante.
	    /// O parâmetro start e end representam um range inclusivo, ou seja, se for requisitado start=1 e end=3, será retornado uma lista com três elementos, com o segundo elemento,
	    /// terceiro e quarto elemento da coleção solicitada.
	    /// O parâmetro end pode ter valores negativos, neste caso ele funciona como um offset considerando o útimo elemento. Exemplo: -1 vai retornar o último elemento,
	    /// -2 vai retornar o penúltimo elemento e assim por diante.
	    /// Caso o parâmetro start seja menor que zero, deve ser considerado como se fosse o primeiro elemento.
	    /// Caso o parâmetro end seja maior que o numero de elementos, deve ser considerado como se fosse o último elemento.
	    /// </summary>
	    /// <param name="key">Deve ser uma string</param>
	    /// <param name="start"></param>
	    /// <param name="end"></param>
	    /// <returns></returns>
		public function Get($key, $startIndex, $endIndex);

	    /// <summary>
	    /// Remove a chave com seus respectivos valores da coleção.
	    /// </summary>
	    /// <param name="key">Deve ser uma string</param>
	    /// <returns>Retorna true se a chave foi removida, false caso a chave nao exista</returns>
		public function RemoveElement($key);

	    /// <summary>
	    /// Remove todos os valores associados com uma chave e um subIndex
	    /// </summary>
	    /// <param name="key">Deve ser uma string</param>
	    /// <param name="subIndex"></param>
	    /// <returns>Retorna true se a chave tem um subIndex associado e ele foi removido, false caso contrario</returns>
		public function RemoveValuesFromSubIndex($key, $subIndex);
	}

}
